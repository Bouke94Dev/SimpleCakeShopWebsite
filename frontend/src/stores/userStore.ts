import { defineStore } from 'pinia';
import axiosInstance  from '@/axiosConfig';

export const userStore = defineStore('user', {
    state: () => ({
        user: null as null | { id: number, name: string, email: string },
        initialized: false,
    }),
    actions: {
        async fetchUser() {
            try{
                const response = await axiosInstance.get('/user')
                this.user = response.data
            } catch {
                this.user = null
            } finally {
                this.initialized = true
            }
        },
        async logout() {
            try {
                await axiosInstance.post('/logout')
            } finally {
                this.initialized = true
                this.user = null
            }
        }
    }
})