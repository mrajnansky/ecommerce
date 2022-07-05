import 'bootstrap/dist/css/bootstrap.min.css';
import Layout from '../components/layouts/layout';
import {useEffect} from 'react';
import {useRouter} from 'next/router'
import {getToken} from "../services/api/authService";

export default function App({Component, pageProps}) {
    const router = useRouter()
    useEffect(() => {
        import ('bootstrap/dist/js/bootstrap.js')
        if (router.pathname !== '/user/login' && !getToken()) {
            router.push('/user/login');
        }
    }, []);

    return (
        <Layout>
            <Component {...pageProps} />
        </Layout>
    )
}