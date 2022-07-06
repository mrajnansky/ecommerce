import {useEffect, useState} from "react";
import {getProductCategory, updateProductCategory, createProductCategory} from "../../../services/api/productCategoryService";
import {Card, Col, Form, Row} from "react-bootstrap";
import Button from "../../buttons/button";
import {useRouter} from "next/router";
import toast from "react-hot-toast";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faArrowLeft} from "@fortawesome/free-solid-svg-icons";

export default function ProductCategoryForm({categoryId} ){
    const router = useRouter();
    const [productCategory, setProductCategory] = useState({
        id: null,
        name: '',
        code: '',
        description: ''
    })
    const [isLoading, setIsLoading] = useState(false)
    useEffect(() => {
        if(categoryId) {
            getProductCategory(categoryId)
                .then(response => response.json())
                .then(data => {
                    setProductCategory(data)
                })
        }
    }, [router.pathname, categoryId])


    const saveCategory = async (e) => {
        e.preventDefault()
        setIsLoading(true)
        let saveFunction = null
        let correctStatusCode = 201
        if(categoryId){
            saveFunction = updateProductCategory
            correctStatusCode = 200
        }else{
            saveFunction = createProductCategory
        }
        saveFunction(productCategory).then(response => {
            if(response.status === correctStatusCode){
                toast.success('Category saved successfully')
                router.push('/products/categories')
            }else{
                toast.error('Error saving category')
            }
            setIsLoading(false)
        })
    }
    return <Row>
        <Col>
            <Card>
                <Card.Body>
                    <Card.Title className={"mb-5"}>
                        <Button
                            type="button"
                            variant="light"
                            title="Back"
                            size={'sm'}
                            className={"me-2"}
                            onClick={() => {router.push('/products/categories')}}
                        >
                            <FontAwesomeIcon icon={faArrowLeft} />
                        </Button>
                        {categoryId ? 'Edit' : 'Create'} category
                    </Card.Title>
                    <Form onSubmit={saveCategory}>
                        <Form.Group className="mb-3">
                            <Form.Label>Code *</Form.Label>
                            <Form.Control
                                type="text"
                                disabled={isLoading}
                                value={productCategory.code}
                                onChange={(ev) => setProductCategory({...productCategory, code: ev.target.value})}
                            />
                        </Form.Group>

                        <Form.Group className="mb-3">
                            <Form.Label>Name *</Form.Label>
                            <Form.Control
                                type="text"
                                disabled={isLoading}
                                value={productCategory.name}
                                onChange={(ev) => setProductCategory({...productCategory, name: ev.target.value})}
                            />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Group className="mb-3" controlId="exampleForm.ControlTextarea1">
                                <Form.Label>Description</Form.Label>
                                <Form.Control
                                    as="textarea" rows={3}
                                    disabled={isLoading}
                                    value={productCategory.description}
                                    onChange={(ev) => setProductCategory({...productCategory, description: ev.target.value})}
                                />
                            </Form.Group>
                        </Form.Group>
                        <div className="d-grid gap-2">
                            <Button
                                type="submit"
                                disabled={isLoading}
                                loading={isLoading}
                                loadingText="Saving category..."
                                text="Save"
                            />
                        </div>
                    </Form>
                </Card.Body>
            </Card>
        </Col>
    </Row>
};