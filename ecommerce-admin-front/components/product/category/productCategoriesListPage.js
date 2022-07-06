import {listProductCategories} from "../../../services/api/productCategoryService";
import {useEffect, useState} from "react";
import {useRouter} from "next/router";
import ProductCategoryCard from "./productCategoryCard";
import {Col, Row, Spinner} from "react-bootstrap";
import Button from '../../buttons/button';

export default function ProductCategoriesListPage(props) {
    const router = useRouter();
    const [productCategories, setProductCategories] = useState([])
    const [hasNextPage, setHasNextPage] = useState(false)
    const [nextPageNumber, setNextPageNumber] = useState(1)
    const [isLoading, setIsLoading] = useState(false)
    const listProducts = async () => {
        setIsLoading(true)
        listProductCategories({page: nextPageNumber, limit:2, deleted_at:"[null]"}).then(response => response.json())
            .then(data => {
                setProductCategories([...productCategories, ...data.data])
                setHasNextPage(data.current_page < data.last_page)
                setNextPageNumber(data.current_page + 1)
                setIsLoading(false)
            })
    }
    useEffect(async () => {
        await listProducts()
    }, [router.pathname]);

    const loadNextPage = () => {
        listProducts(nextPageNumber)
    }

    const removeCategory = (category) => {
        setProductCategories(productCategories.filter(c => c.id !== category.id))
    }

    return <>
        <Row className={'mb-5'}>
            <Col>
                <h2>Product categories</h2>
            </Col>
            <Col>
                <Button
                    variant="success"
                    className="float-end"
                    onClick={() => {
                        router.push('/products/categories/create')
                    }}
                    text={'+ New'}
                />
            </Col>
        </Row>
        <Row>
            {productCategories.map(object => {
                return <Col md={4} xs={12} key={object.id}>
                    <ProductCategoryCard key={object.id} category={object} onDeleteDone={removeCategory}/>
                </Col>
            })}
        </Row>
        {isLoading && <Row>
            <Col className={'align-content-center'}>
                <Spinner animation="border" role="status">
                    <span className="visually-hidden">Loading...</span>
                </Spinner>
            </Col>
        </Row>}
        {hasNextPage && !isLoading &&
            <Row className="mt-5 mb-5">
                <Button
                    variant="light"
                    onClick={() => {
                        loadNextPage()
                    }}
                    text={'Load more'}
                />
            </Row>
        }
    </>
};