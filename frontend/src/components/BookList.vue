<template>
    <div class="container">
        <h2 style="text-align:center"> Book Collection</h2>
        <router-link to="/create" class="btn btn-primary mb-3" >Add New Book</router-link>
         <div class="row">
              <div>
        <table  class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Published Year</th>
                    <th style="width:220px;">Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{ book.title }}</td>
                    <td>{{ book.author }}</td>
                    <td>{{ book.genre }}</td>
                    <td>{{ book.published_year }}</td>
                    <td>{{ book.description }}</td>
                    <td>
                        <router-link :to="{ name: 'edit', params: { id: book.id } }" class="btn btn-success btn-sm">Edit</router-link>
                       
                    </td>
                    <td>
                         <button @click="deleteBook(book.id)" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            books: []
        };
    },
    mounted() {
        this.fetchBooks();
    },
    methods: {
        fetchBooks() {
            axios.get('books')
                .then(response => {
                    this.books = response.data;
                })
                .catch(error => {
                            console.error(error);
                 });
        },
        deleteBook(id) {
                 if (confirm('Are you sure you want to delete this book?')) {
                axios.delete(`books/delete/${id}}`)
                    .then(() => {
                        this.fetchBooks();
                    })
                    .catch(error => {
                            console.error(error);
                     });
            }
        }
    }
};
</script>
