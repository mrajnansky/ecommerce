export function makeRequest(url, method, data) {
    return fetch(`http://localhost:8000/api/v1/${url}`,{
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
}
