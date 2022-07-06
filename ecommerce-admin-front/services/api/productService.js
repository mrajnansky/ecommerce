import {makeRequest} from "./api";
export async function listProducts() {
    return makeRequest(`products`,'GET',{})
}