<template>
    <div class="header-search-wrap" v-click-outside="hideSuggestions">
        <div class="header-search">
            <form class="search-form" @submit.prevent="search">
                <div class="header-search-lg">
                    <input
                        type="text"
                        name="query"
                        class="form-control search-input"
                        autocomplete="off"
                        v-model="form.query"
                        placeholder="Browse for companies or a keyword. Example: Wood mills"
                        @keydown.esc="hideSuggestions"
                        @keydown.down="nextSuggestion"
                        @keydown.up="prevSuggestion"
                    >

                    <div class="header-search-right" @focusin="hideSuggestions">
                        <button type="submit" class="btn btn-search">
                            <i class="las la-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="search-suggestions" v-if="shouldShowSuggestions">
            <div class="search-suggestions-inner custom-scrollbar" ref="searchSuggestionsInner">
                <div class="category-suggestion" v-if="suggestions.categories.length !== 0">
                    <h6 class="title">Categories</h6>

                    <ul class="list-inline category-suggestion-list">
                        <li
                            v-for="category in suggestions.categories"
                            :key="category.id"
                            class="list-item"
                            :class="{ active: isActiveSuggestion(category) }"
                            :ref="category.slug"
                            @mouseover="changeActiveSuggestion(category)"
                            @mouseleave="clearActiveSuggestion"
                        >
                            <a
                                :href="route('category.show', category.id)"
                                class="single-item"
                                v-html="category.name"
                                @click="hideSuggestions"
                            >
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="category-suggestion" v-if="suggestions.products.length !== 0">
                    <h6 class="title">Products</h6>

                    <ul class="list-inline category-suggestion-list">
                        <li
                            v-for="product in suggestions.products"
                            :key="product.id"
                            class="list-item"
                            :class="{ active: isActiveSuggestion(product) }"
                            :ref="product.slug"
                            @mouseover="changeActiveSuggestion(product)"
                            @mouseleave="clearActiveSuggestion"
                        >
                            <a
                                :href="route('products.show', product.id)"
                                class="single-item"
                                v-html="product.name"
                                @click="hideSuggestions"
                            >
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="category-suggestion" v-if="suggestions.users.length !== 0">
                    <h6 class="title">Users</h6>

                    <ul class="list-inline category-suggestion-list">
                        <li
                            v-for="user in suggestions.users"
                            :key="user.id"
                            class="list-item"
                            :class="{ active: isActiveSuggestion(user) }"
                            :ref="user.slug"
                            @mouseover="changeActiveSuggestion(user)"
                            @mouseleave="clearActiveSuggestion"
                        >
                            <a
                                :href="route('user.show', user.id)"
                                class="single-item"
                                v-html="user.name"
                                @click="hideSuggestions"
                            >
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: ['initialQuery'],

        data() {
            return {
                activeSuggestion: null,
                showSuggestions: false,
                form: {
                    query: this.initialQuery,
                },
                suggestions: {
                    categories: [],
                    products: [],
                    users: []
                },
            };
        },

        computed: {
            initialCategoryIsNotInCategoryList() {
                return ! this.categories.includes(this.initialCategory);
            },

            shouldShowSuggestions() {
                if (! this.showSuggestions) {
                    return false;
                }

                return this.hasAnySuggestion;
            },

            hasAnySuggestion() {
                return this.allSuggestions.length !== 0;
            },

            allSuggestions() {
                return [...this.suggestions.categories, ...this.suggestions.products, ...this.suggestions.users];
            },

            firstSuggestion() {
                return this.allSuggestions[0];
            },

            lastSuggestion() {
                return this.allSuggestions[this.allSuggestions.length - 1];
            },
        },

        watch: {
            'form.query': function (newQuery) {
                if (newQuery === '') {
                    this.clearSuggestions();
                } else {
                    this.showSuggestions = true;

                    this.fetchSuggestions();
                }
            },
        },

        methods: {

            fetchSuggestions() {
                $.ajax({
                    method: 'GET',
                    url: '/suggestions?query=' + this.form.query, // route('suggestions.index', this.form),
                }).then((suggestions) => {
                    this.suggestions.categories = suggestions.categories;
                    this.suggestions.products = suggestions.products;
                    this.suggestions.users = suggestions.users;

                    this.clearActiveSuggestion();
                    this.resetSuggestionScrollBar();
                });
            },

            search() {
                
            },

            clearSuggestions() {
                this.suggestions.categories = [];
                this.suggestions.products = [];
                this.suggestions.users = [];
            },

            hideSuggestions(e) {
                this.showSuggestions = false;

                this.clearActiveSuggestion();
            },

            isActiveSuggestion(suggestion) {
                if (! this.activeSuggestion) {
                    return false;
                }

                return this.activeSuggestion.slug === suggestion.slug;
            },

            changeActiveSuggestion(suggestion) {
                this.activeSuggestion = suggestion;
            },

            clearActiveSuggestion() {
                this.activeSuggestion = null;
            },

            nextSuggestion() {
                if (! this.hasAnySuggestion) {
                    return;
                }

                this.activeSuggestion = this.allSuggestions[this.nextSuggestionIndex()];

                if (! this.activeSuggestion) {
                    this.activeSuggestion = this.firstSuggestion;
                }

                this.adjustSuggestionScrollBar();
            },

            prevSuggestion() {
                if (! this.hasAnySuggestion) {
                    return;
                }

                if (this.prevSuggestionIndex() === -1) {
                    this.clearActiveSuggestion();

                    return;
                }

                this.activeSuggestion = this.allSuggestions[this.prevSuggestionIndex()];

                if (! this.activeSuggestion) {
                    this.activeSuggestion = this.lastSuggestion;
                }

                this.adjustSuggestionScrollBar();
            },

            nextSuggestionIndex() {
                return this.currentSuggestionIndex() + 1;
            },

            prevSuggestionIndex() {
                return this.currentSuggestionIndex() - 1;
            },

            currentSuggestionIndex() {
                return this.allSuggestions.indexOf(this.activeSuggestion);
            },

            adjustSuggestionScrollBar() {
                this.$refs.searchSuggestionsInner.scrollTop = this.$refs[this.activeSuggestion.name][0].offsetTop - 200;
            },

            resetSuggestionScrollBar() {
                this.$refs.searchSuggestionsInner.scrollTop = 0;
            },
        },
    };
</script>
