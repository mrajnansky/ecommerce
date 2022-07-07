import { useState } from 'react'
import {Row, Col, Card, Form} from 'react-bootstrap';
import {login} from '../../services/api/authService'
import toast from 'react-hot-toast';
import Button from "../buttons/button";
import Router from 'next/router'


export default function LoginPage( props ){
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [isLoading, setIsLoading] = useState(false)
    const makeLogin = async (e) => {
        e.preventDefault()
        setIsLoading(true)
        const loadingToast = toast.loading('Loading...')
        const response = await login(email, password)
        toast.dismiss(loadingToast)
        if(response.status === 200) {
            Router.push('/')
            toast.success('Logged in successfully')
        }else{
            toast.error('Error login in. Check your credentials')
        }
        setIsLoading(false)
    }

    return (<>
        <Row className={'mb-5'}>
            <Col className={'text-center'}>
                <h1>Admin</h1>
            </Col>
        </Row>
        <Row>
          <Col>
          <Card>
            <Card.Body>
                <Card.Title>Welcome back!</Card.Title>
                <Form onSubmit={makeLogin}>
                    <Form.Group className="mb-3" controlId="formBasicEmail">
                        <Form.Label>Email address</Form.Label>
                        <Form.Control type="email" placeholder="Enter email" disabled={isLoading} onChange={(ev) => setEmail(ev.target.value)} />
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="formBasicPassword">
                        <Form.Label>Password</Form.Label>
                        <Form.Control type="password" placeholder="Password" disabled={isLoading} onChange={(ev) => setPassword(ev.target.value)} />
                    </Form.Group>
                    <div className="d-grid gap-2">
                        <Button type="submit" disabled={isLoading} loading={isLoading} loadingText="Logging in..." text="Login" />
                    </div>
                </Form>
            </Card.Body>
            </Card>
          </Col>
        </Row>
    </>)
};