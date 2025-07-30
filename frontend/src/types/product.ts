export interface ProductImage {
    id: number
    image: string
}

export interface Product {
    id: number
    name: string
    description: string
    amount: number
    price: number
    product_image_id: number
    created_at: number
    updated_at: number
    product_image: ProductImage
}