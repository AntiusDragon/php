export default function Book({book}) {

    const { id, title, author, type, pages, price, img } = book;

    return (
        <div className="book">
            <div className="book_img">
                <img src={img} alt={title} />
            </div>
            <div className="book_title">Title: {title}</div>
            <div className="book_author">Author: {author}</div>
            <div className="book_type">Type: {type}</div>
            <div className="book_pages">Pages: {pages}</div>
            <div className="book_price">Price: {price} €</div>
        </div>
    )
}