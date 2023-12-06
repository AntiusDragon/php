import { useContext } from "react";
import { BookContext } from "./BooksContext";
import Books from "./Books";

export default function Layout() {
  const { books } = useContext(BookContext);

  return (
    <div className="layout">
      {books === null 
        ? <div className="loading">Loading...</div> 
        : <Books />}
    </div>
  );
}
