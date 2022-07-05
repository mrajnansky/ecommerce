import Head from 'next/head'
import {useEffect, useState} from "react";
import {listProducts} from "../../services/api/productService";
import {useRouter} from "next/router";
export default function ProductsList() {
    const router = useRouter();
    const [isLoading, setIsLoading] = useState(false)
    const [products, setProducts] = useState([])
    useEffect(async () => {
        setIsLoading(true)
        listProducts().then(async (response) => {
            const data = await response.json()
            console.log(response, data)
            setProducts(data.data)
            setIsLoading(false)
        }).catch(error => {
            setIsLoading(false)
        })
    }, [router.pathname]);

    return(
    <>
        <Head>
            <title>Products list</title>
        </Head>
        <h2>This is the list</h2>
        {products.map(function(object, i){
            return <p key={i}>{JSON.stringify(object)}</p>;
        })}
    </>)
}