import './App.scss';
import { BooksProvider } from './components/BooksContext';
import Layout from './components/Layout';

function App() {
  return (
    <BooksProvider>
      <div className='app'>
        <div className='bin'>
          <Layout />
          {/* <h1>Books Shop</h1> */}
        </div>
      </div>
    </BooksProvider>
  );
}

export default App;
