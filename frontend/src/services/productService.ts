import axios from 'axios';
import type { Product } from '@/types/product'

const baseUrl = 'http://localhost:8000/api'

export async function fetchProducts(): Promise<Product[]> {
    const response = await axios.get<Product[]>(`${baseUrl}/products`)
    return response.data

}

export async function fetchProduct(id: string): Promise<Product> {
    const response = await axios.get<Product>(`${baseUrl}/products/${id}`)
    return response.data
}