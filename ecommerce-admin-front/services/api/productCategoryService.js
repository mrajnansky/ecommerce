import {makeRequest} from "./api";
export async function listProductCategories(data = null) {
    return makeRequest(`products/categories`,'GET', data)
}

export async function getProductCategory(productCategoryId) {
    return makeRequest(`products/categories/${productCategoryId}`,'GET', null)
}

export async function updateProductCategory(productCategory) {
    return makeRequest(`products/categories/${productCategory.id}`,'PUT', productCategory)
}

export async function createProductCategory(productCategory) {
    return makeRequest(`products/categories`,'POST', productCategory)
}

export async function deleteProductCategory(productCategoryId) {
    return makeRequest(`products/categories/${productCategoryId}`,'DELETE', null)
}


