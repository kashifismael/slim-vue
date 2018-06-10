class HttpClient {

    get(url) {
        return fetch(url)
            .then(response => response.json())
    }

    post(url, data) {
        return fetch(url, {
            body: JSON.stringify(data),
            headers: {
                'content-type': 'application/json'
            },
            method: 'POST'
        })
            .then(response => response.json())
    }

    put(url, data) {
        return fetch(url, {
            body: JSON.stringify(data),
            headers: {
                'content-type': 'application/json'
            },
            method: 'PUT'
        })
            .then(response => response.json())
    }

    delete(url) {
        return fetch(url, {
            method: 'DELETE'
        })
            .then(response => response.json())
    }

}

export const httpClient = new HttpClient()