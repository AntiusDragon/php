import { useContext, useEffect, useState } from "react";
import { BookContext } from "./BooksContext";

export default function Filter() {

  const { types, setBooks, books } = useContext(BookContext);

  const [filter, setFilter] = useState(0);

//   function headleFilter(e) {
//     setFilter(parseInt(e.target.value));
//     if (parseInt(e.target.value) === 0) {
//         setBooks(bk => bk.map(b => ({...b, show: true})));
//         return;
//     }
//     setBooks(bk => bk.map(b => (b.type === parseInt(e.target.value) ? {...b, show: true} : {...b, show: false})));
//     // setBooks(books.filter(bk => bk.type === parseInt(e.target.value)));
//   }

  useEffect(() => {
    const f = parseInt(filter);
    if (f === 0) {
        setBooks(bk => bk.map(b => ({...b, show: true})));
        return;
    }
    setBooks(bk => bk.map(b => (b.type === f ? {...b, show: true} : {...b, show: false})));
  }, [filter, setBooks])

  if (types === null) {
    return (
      <div className="filter">
        <select defaultValue={0}>
          <option value={0} disabled>Filtras kraunasi</option>
        </select>
      </div>
    );
  }
  return (
      <div className="filter">
          <select className="filter" value={filter} onChange={e => setFilter(e.target.value)}>
              <option value={0}>Visos knigos</option>
              {types.map(t => <option key={t.id} value={t.id}>{t.title}</option>)}
          </select>
      </div>
  )
}
