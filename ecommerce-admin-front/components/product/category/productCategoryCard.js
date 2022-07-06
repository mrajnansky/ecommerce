import {Card, Button} from "react-bootstrap";
import { faPencil, faTrash } from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {useRouter} from "next/router";
import {deleteProductCategory} from "../../../services/api/productCategoryService";
import toast from "react-hot-toast";
import {useState} from "react";

export default function ProductCategoryCard({category, onDeleteDone} ){
    const router = useRouter();
    const [isLoading, setIsLoading] = useState(false)
    const edit = (category) => {
        router.push(`/products/categories/edit/${category.id}`)
    }
    const remove = (category) => {
        setIsLoading(true)
        deleteProductCategory(category.id)
            .then(response => {
                if(response.status === 200){
                    toast.success('Category deleted successfully')
                    onDeleteDone(category)
                }else{
                    toast.error('Error deleting category')
                }
                setIsLoading(false)
            })
    }
    return <Card className={'mb-5'}>
        <Card.Body>
            <Card.Title>{category.name}</Card.Title>
            <Card.Text>
                {category.code} - {category.description}
            </Card.Text>
        </Card.Body>
        <Card.Footer>
            <Button disabled={isLoading} variant="primary" onClick={() => {edit(category)}}>
                <FontAwesomeIcon icon={faPencil} />
            </Button>
            <Button disabled={isLoading} variant="danger" className={"ms-sm-2"} onClick={() => {remove(category)}}>
                <FontAwesomeIcon icon={faTrash} />
            </Button>
        </Card.Footer>
    </Card>
};