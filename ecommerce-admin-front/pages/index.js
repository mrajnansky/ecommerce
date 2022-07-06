import Head from 'next/head'
export default function Home({userData}) {
  return (
    <div className="container">
      <Head>
        <title>Index</title>
      </Head>

      <main>
        <h1>Welcome!</h1>
      </main>
      
    </div>
  )
}
