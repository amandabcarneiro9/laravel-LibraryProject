import React from 'react'
import {useState,useEffect} from 'react'
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useParams
} from "react-router-dom";
import BookDetail from './ BookDetail'
import BookReview from './BookReview'



function App(){
let { bookId } = useParams();
const [book, setBook] = useState(null);

    const loadData = async () => {
        const response = await fetch(`/api/books/${bookId}`);
        const data = await response.json(); 
        setBook(data);
         
    }

    useEffect(loadData, []);

if(book === null ){
    return "Loading..."
}

    return (
    <Switch>
        <Route path="/book/:id/review">
            <BookReview id={ bookId } title={book.title} />
        </Route>
        <Route path="/book/:id">
            <BookDetail book={book} id={ bookId }  />
        </Route>
    </Switch>
)
}


export default App