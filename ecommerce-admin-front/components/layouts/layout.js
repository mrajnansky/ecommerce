import {Col, Container, Row} from 'react-bootstrap';
import {Toaster} from "react-hot-toast";
import Menu from '../menus/menu'
import Head from "next/head";
import './layout.module.css'
export default function Layout({children, isLoginPage = false}) {
    return (<div className={'layout'}>
        <Head>
            <title>Admin</title>
        </Head>
        <Toaster position="top-right"/>
        {!isLoginPage ? <Menu/> : null}
        <Container fluid>
            <Row>
                <Col>
                    <Container className={'pt-5'}>
                        {children}
                    </Container>
                </Col>
            </Row>
        </Container>
    </div>)
}
;