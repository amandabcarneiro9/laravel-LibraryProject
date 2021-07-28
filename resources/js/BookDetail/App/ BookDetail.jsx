function BookDetail(props){
const {book} = props

    return(
        <>
        {book ?
        <div>
     <h1>{book.title}</h1> 
    <ul>
        <li>Authors: {book.authors}</li>
    </ul> <br />
   <img src={book.image} alt={book.title} />
    </div>
    :
    null
    }

   </> 
   
   )
}

export default BookDetail