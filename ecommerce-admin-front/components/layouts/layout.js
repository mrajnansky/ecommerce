import {Col, Container, Row} from 'react-bootstrap';
import {Toaster} from "react-hot-toast";

export default function Layout({children}) {
    return (<>
        <Toaster position="top-right"/>
        <Container fluid>
            <Row>
                <Col>
                    <Container className={'pt-5'}>
                        {children}
                    </Container>
                </Col>
            </Row>
        </Container>
    </>)
}
;