const baseUrl = import.meta.env.VITE_API_URL || 'http://localhost:8000/'


export function getImageUrl(path)
{
    if(!path) return '';

    if(path.startsWith('http://') || path.startsWith('https://')){
        return path;
    }

    return `${baseUrl}${path.startsWith('/') ? path.slice(1) : path}`;
}