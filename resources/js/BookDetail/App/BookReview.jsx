import { useState } from "react"

function BookReview(props){

    const {id,title} = props
    const [values, setValues] = useState({
    rating: 0,
    text: ''
});
 
const handleChange = (event) => {
    setValues(previous_values => {
        return ({...previous_values, 
            [event.target.name]: event.target.value
        });
    });
}

const handleSubmit = (event) => {
    event.preventDefault();

    fetch(`/api/books/${id}/review`, {
        method: 'POST',
        body: JSON.stringify(values),
        headers: {'Content-type' : 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    })
}

    return(
        <>
     <form action=""  onSubmit={ handleSubmit }>
    <h1>Book Review: {title}</h1>

    <div className="form-group">
    <label htmlFor="rating">Rating:</label>
    <input type="number"
     name="rating" 
     id="number"  
     value={ values.rating } 
     onChange={handleChange}/> 

    <label htmlFor="">Text:</label>
    <textarea 
    name="text" 
    id="text" 
    cols="30" 
    rows="10" 
    value={ values.text } 
    onChange={handleChange} ></textarea> 
    </div>
    

    <div className="form-group">
    <input type="submit" name="submit" value="submit" />
    </div>


    <div>bla </div>

    </form>
    </>
    )
}

export default BookReview