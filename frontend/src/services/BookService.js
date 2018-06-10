import { httpClient } from './HttpClient'

class BookService {

    constructor(){
        this._http = httpClient;
        this.apiUrl = "http://slimapp/api/books";
    }
    
    getAllBooks() {
        return this._http.get(this.apiUrl);
    }

    getOneBookById(id){
       return this._http.get(`${this.apiUrl}/${id}`);
    }

    createBook(book){
        return this._http.post(this.apiUrl, book);
    }

    updateBook(book){
        return this._http.put(`${this.apiUrl}/${book.id}`, book);
    }

    deleteBook(id){
        return this._http.delete(`${this.apiUrl}/${id}`)
    }

}

const bookService = new BookService()
export default bookService