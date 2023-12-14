import { useContext } from "react";
import { BookContext } from "./BooksContext";
import Books from "./Books";
import Top from "./Top";

export default function Layout() {
  const { books } = useContext(BookContext);

  return (
    <div className="layout">
      <Top />
      {books === null 
        ? <div className="loading">Ktaunasi knygos...</div> 
        : <Books />}
    </div>
  );
}
