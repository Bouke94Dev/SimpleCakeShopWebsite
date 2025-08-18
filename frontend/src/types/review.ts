import type { User } from '@/types/user'

export interface Review {
    id: number,
    product_id: number,
    user_id: number,
    rating: number,
    comment?: string,
    created_at: string,
    updated_at: string,
    user:User
}

// type voor POST body
export interface ReviewCreate {
  product_id: number
  rating: number
  comment?: string
}