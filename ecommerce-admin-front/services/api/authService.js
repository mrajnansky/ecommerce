import {makeRequest} from "./api";
import * as cookieManager from "../miscellany/cookies";

export function login(email, password) {
    return makeRequest(`auth/tokens`,'POST',{email, password})
        .then(async (response) => {
            if(response.status === 200) {
                const data = await response.json();
                setToken(data.access_token)
            }
            return response;
        })
}

export function setToken(token) {
    cookieManager.setCookie('userToken', token.split('|')[1])
}

export function getToken() {
    if(typeof document !== 'undefined'){
        return cookieManager.getCookie('userToken')
    }
    return false;

}