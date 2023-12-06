import { createContext, useEffect, useState } from 'react';
import axios from 'axios';

export const BookContext = createContext();

const booksUrl ='https://in3.dev/knygos/';
const typesUrl ='https://in3.dev/knygos/types/';

// export const BooksContext = ({children}) => {
// };

export const BooksProvider = ({children}) => {
    
    const [books, setBooks] = useState(null)
    
    useEffect(() => {
        axios.get(booksUrl)
        .then(res => {
            setBooks(res.data);
            console.log(res.data);
        })
        // .catch(err => {
        //     console.log(err);
        // })
    }, []);
    
    console.log(children);

    return (
        <BookContext.Provider value={{
            books
        }}>
            {children}
        </BookContext.Provider>
    )
}