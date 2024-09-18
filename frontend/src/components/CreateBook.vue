<template>
    <div>
        <h2>Add New Book</h2>
        <form  @submit.prevent="validateAndSubmit">
            <input v-model="book.title" class="form-control" placeholder="Title" required />
            <br/>
            <input v-model="book.author" class="form-control" placeholder="Author (First Last)" required />
            <br/>
            <input v-model="book.genre" class="form-control" placeholder="Genre" required />
            <br/>
            <input v-model="book.published_year" type="number" min="1"  class="form-control" placeholder="Published Year" required />
            <br/>
            <textarea v-model="book.description" class="form-control" placeholder="Description" required></textarea>
            <br/>
            <button type="submit" class="btn btn-primary">Add Book</button>
            <br/>
            <div v-if="errorMessage" class="text-danger">{{ errorMessage }}</div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            book: {
                title: '',
                author: '',
                genre: '',
                published_year: '',
                description: ''
            },
            errorMessage: ''
        };
    },
    methods: {
         validateAndSubmit() {
            const authorParts = this.book.author.trim().split(' ');
            if (authorParts.length < 2) {
                this.errorMessage = 'Author must include a first and last name.';
                return;
            }

            if (this.book.description.length < 100) {
                this.errorMessage = 'Description must be at least 100 characters.';
                return;
            }

            this.errorMessage = '';
            this.addBook();
        },
        addBook() {
            axios.post('books/create', this.book)
                .then(() => {
                    this.$router.push('/');
                })
                .catch(error => {
                            console.error(error);
                 });
        }
    }
};
</script>
