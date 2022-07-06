import {getToken} from "./authService";

export function makeRequest(url, method, data) {
    let headers = {
        'Accept': 'application/json'
    }
    if(getToken()){
        headers['Authorization'] = `Bearer ${getToken()}`
    }
    const dataString = method === 'GET' && data ? makeDataString(data) : '';
    let formData = null;

    if(method === 'POST' || method === 'PUT'){
        formData = new FormData();
        for(let key in data){
            if(data[key] !== null && data[key] !== undefined) {
                formData.append(key, data[key]);
            }
        }
        if(method === 'PUT'){
            formData.append('_method', 'PUT');
            method = 'POST';
        }
    }
    return fetch(`http://localhost:8000/api/v1/${url}${dataString}`,{
        method: method,
        headers,
        body: formData
    })
}

const makeDataString = (data) => {
    let dataString = '';
    for(let key in data){
        dataString += `&${key}=${data[key]}`
    }
    return `?${dataString.substring(1)}`
}
