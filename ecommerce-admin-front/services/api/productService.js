import {makeRequest} from "./api";
export async function listProducts() {
    console.log("LIST")
    return makeRequest(`products`,'GET',{})
}