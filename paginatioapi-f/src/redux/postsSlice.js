import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import axios from 'axios';

export const fetchPosts = createAsyncThunk(
  'posts/fetchPosts',
  async ({ page, searchQuery, rowsPerPage }) => {
    const response = await axios.get(`${process.env.REACT_APP_API_URL}`, {
      params: {
        page,
        search: searchQuery,
        per_page: rowsPerPage, 
      },
    });
    console.log( ' afdadfdf', process.env.REACT_APP_API_URL);

    return response.data;
  }
);

const postsSlice = createSlice({
  name: 'posts',
  initialState: {
    posts: [],
    currentPage: 1,
    searchQuery: '',
    rowsPerPage: 20, // Default value
    totalPages: 0,
  },
  reducers: {
    setCurrentPage: (state, action) => {
      state.currentPage = action.payload;
    },
    setSearchQuery: (state, action) => {
      state.searchQuery = action.payload;
    },
    setRowsPerPage: (state, action) => {
      state.rowsPerPage = action.payload;
    },
  },
  extraReducers: (builder) => {
    builder.addCase(fetchPosts.fulfilled, (state, action) => {
      state.posts = action.payload.data;
      state.totalPages = action.payload.last_page;
    });
  },
});

export const { setCurrentPage, setSearchQuery, setRowsPerPage } = postsSlice.actions;
export default postsSlice.reducer;
