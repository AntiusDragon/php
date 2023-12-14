import { createContext, useEffect, useState } from 'react';
import axios from 'axios';

export const BookContext = createContext();

const booksUrl ='https://in3.dev/knygos/';
const typesUrl ='https://in3.dev/knygos/types/';

// export const BooksContext = ({children}) => {
// };

export const BooksProvider = ({children}) => {
    
    const [books, setBooks] = useState(null)
    const [types, setTypes] = useState(null)
    
    useEffect(() => {
        axios.get(booksUrl)
        .then(res => {
            setBooks(res.data.map(b => ({...b, show: true})));
            console.log(res.data);
        })
    }, []);

    useEffect(() => {
        setTimeout(() => {
        axios.get(typesUrl)
        .then(res => {
            setTypes(res.data);
            console.log(res.data);
        })
        },
        3000);
    }, []);
    
    console.log(children);

    return (
        <BookContext.Provider value={{
            books: books,
            types,
            setBooks,
            setTypes,
        }}>
            {children}
        </BookContext.Provider>
    )
}