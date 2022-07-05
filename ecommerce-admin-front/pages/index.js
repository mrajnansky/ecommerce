import Head from 'next/head'
import Link from 'next/link';
export default function Home({userData}) {
  return (
    <div className="container">
      <Head>
        <title>Index</title>
      </Head>

      <main>
        <h2>This sould serve a menu</h2>
        <Link href="/products">
          <a>Product list</a>
        </Link>
      </main>
      
    </div>
  )
}
