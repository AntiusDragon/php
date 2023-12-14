import './App.scss';
import { BooksProvider } from './components/BooksContext';
import Layout from './components/Layout';

function App() {
  return (
    <BooksProvider>
      <div className='app'>
        <div className='bin'>
          <Layout />
        </div>
      </div>
    </BooksProvider>
  );
}

export default App;
