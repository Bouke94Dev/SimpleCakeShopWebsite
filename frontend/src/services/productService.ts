import axiosInstance  from '@/axiosConfig';  // path naar axios.js
import type { Product } from '@/types/product'
import type { Login } from '@/types/login'
import type { Register } from '@/types/register'
import type { Review } from '@/types/review';
import { route } from 'ziggy-js'
import { Ziggy } from '@/ziggy' // pad naar gegenereerde ziggy.ts

// Todo: use ziggy route for url
export async function fetchProducts(): Promise<Product[]> {
    const response = await axiosInstance.get<Product[]>(`/api/products`)
    return response.data

}

// Todo: use ziggy route for url
export async function fetchProduct(id: string): Promise<Product> {
    const response = await axiosInstance.get<Product>(`/api/products/${id}`)
    return response.data
}

export async function login(data: Login): Promise<void>
{
    await axiosInstance.get(`/sanctum/csrf-cookie`);
    await axiosInstance.post(route('login', undefined, undefined, Ziggy), data);
}

export async function register(data: Register): Promise<void>
{
    await axiosInstance.get(`/sanctum/csrf-cookie`);
    await axiosInstance.post(route('register', undefined, undefined, Ziggy), data);    
}

export async function fetchReviews(productId: number): Promise<Review[]> {
    const response = await axiosInstance.get(`/api/products/${productId}/reviews`)
    return response.data
}

export async function addReview(data: { product_id: number; rating: number; comment?: string }): Promise<Review> {
    await axiosInstance.get(`/sanctum/csrf-cookie`);
    const response = await axiosInstance.post(`/reviews`, data); 
    return response.data;
}
