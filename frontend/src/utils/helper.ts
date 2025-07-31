const baseUrl = import.meta.env.VITE_API_URL || 'http://localhost:8000/images';



export function getImageUrl(path: string|undefined, blurred: boolean = false)
{
    if(!path) return '';


    if (blurred) {
        return `${baseUrl}/blurred/${path}`;
    } else {
        return `${baseUrl}/${path}`;
    }


}