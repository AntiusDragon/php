import { useContext } from "react";
import { BookContext } from "./BooksContext";

export default function Book({book}) {

    const { id, title, author, type, pages, price, img } = book;
    const { types } = useContext(BookContext);

    return (
        <div className="book">
            <div className="book_img">
                <img src={img} alt={title} />
            </div>
            <div className="book_title">Title: {title}</div>
            <div className="book_author">Author: {author}</div>
            <div className="book_type">Type: {types !== null ? types.find(t => t.id === type).title : ''}</div>
            <div className="book_pages">Pages: {pages}</div>
            <div className="book_price">{price} Eur</div>
        </div>
    )
}