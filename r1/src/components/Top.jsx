import Filter from "./Filter";

export default function Top() {
    return (
        <div className="top">
            <div className="top_title">Knygų parduotuvė</div>
            <div className="top_buttons">
                <Filter />
            </div>
            <div className="top_subtitle">Knygų sąrasas</div>
        </div>
    )
}