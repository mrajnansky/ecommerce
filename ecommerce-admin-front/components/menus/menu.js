import {Button, Container, Nav, Navbar, Offcanvas} from 'react-bootstrap';
import {useState} from 'react'
import Link from "next/link";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faList, faLockOpen} from "@fortawesome/free-solid-svg-icons";
import {logout as doLogout} from "../../services/api/authService";
export default function Menu() {
    const [show, setShow] = useState(false);
    const closeSidebar = () => setShow(false);
    const showSidebar = () => setShow(true);
    const logout = () => {
        doLogout()
        window.location.reload()
    }
    return (
        <>
            <Navbar bg="dark" sticky="top">
                <Container>
                    <Button variant={"outline-light"} className={'mx-2'} onClick={showSidebar}>
                        <FontAwesomeIcon icon={faList} />
                    </Button>
                    <Navbar.Brand className={'text-white'}>
                        Admin
                    </Navbar.Brand>
                    <Button variant={"outline-light"} className={'mx-2'} onClick={logout}>
                        <FontAwesomeIcon icon={faLockOpen} />
                    </Button>
                </Container>
            </Navbar>
            <Offcanvas show={show} onHide={closeSidebar}>
                <Offcanvas.Header closeButton>
                    <Offcanvas.Title>Admin</Offcanvas.Title>
                </Offcanvas.Header>
                <Offcanvas.Body>
                    <Nav className="flex-column">
                        <Link href={'/'} passHref>
                            <Nav.Link onClick={closeSidebar}>Home</Nav.Link>
                        </Link>
                        <Link href={'/products'} passHref>
                            <Nav.Link onClick={closeSidebar}>Products</Nav.Link>
                        </Link>
                        <Link href={'/products/categories'} passHref>
                            <Nav.Link onClick={closeSidebar}>Product categories</Nav.Link>
                        </Link>
                    </Nav>
                </Offcanvas.Body>
            </Offcanvas>
        </>
    );
}