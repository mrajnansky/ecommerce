import { useRouter } from 'next/router'
import ProductCategoryForm from '../../../../components/product/category/productCategoryForm'
export default () => {
    const router = useRouter()
    const { category_id } = router.query
    return <ProductCategoryForm categoryId={category_id} />;
}