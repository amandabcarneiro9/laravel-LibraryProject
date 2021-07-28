export default function Logout(){

const handleClick = async (event) =>{

    const response = await fetch('/logout', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })

    const response_data = await response.json();
}

    return (
    <button onClick= {handleClick} >Logout</button>
        )
}