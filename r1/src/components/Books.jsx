import { useContext } from "react";
import { BookContext } from "./BooksContext";
import Book from "./Book";

export default function Books() {
  const { books } = useContext(BookContext);

  return (
    <div className="books">
        {
            books.map(book => 
                <Book key={book.id} book={book} />)
        }
    </div>
  );
}
