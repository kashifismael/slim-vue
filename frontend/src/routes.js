import Home from './components/Home'
import About from './components/About'
import Contact from './components/Contact'
import ViewBook from './components/ViewBook'
import AddBook from './components/AddBook'

export default [
    { path: "/", component: Home },
    { path: "/about", component: About },
    { path: "/contact", component: Contact },
    { path: "/view-book/:id", component: ViewBook },
    { path: "/add-book", component: AddBook }
]