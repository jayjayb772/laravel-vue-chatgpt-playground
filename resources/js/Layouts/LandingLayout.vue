<template>
    <div>
        <div>
        <nav>
            <div class="nav-left">
                <div v-if="loggedIn" @click="viewDashboard">
                <i class="fa fa-home nav-icon"></i>
                </div>
                <!-- Add links or branding here -->
            </div>
            <div class="nav-center">
                <slot name="page-header"></slot>
            </div>
            <div class="nav-right">
                <div class="dropdown" @mouseleave="showDropdown = false">
                    <div @mouseover="showDropdown = true" >
                        <i class="fa fa-user nav-icon"></i>
                    </div>
                    <div v-if="showDropdown" class="dropdown-content dropdown-left">
                        <a v-if="!loggedIn" class="dropdown-option" @click="signIn">Sign In</a>
                        <a v-if="!loggedIn" class="dropdown-option" @click="signUp">Sign Up</a>
                        <a v-if="loggedIn" class="dropdown-option" @click="viewDashboard">Dashboard</a>
                        <a v-if="loggedIn" class="dropdown-option" @click="viewProfile">My account</a>
                        <a v-if="loggedIn" class="dropdown-option" @click="logOut">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main class="col">
        <section class="container page-section">
            <slot></slot>
        </section>
    </main>
    </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
export default {
    name: "LandingLayout",
    data() {
        return {
            showDropdown: true
        }
    },
    methods: {
        signIn() {
            this.$inertia.visit(route('login'))
        },
        signUp() {
            this.$inertia.visit(route('register'))
        },
        logOut() {
            this.$inertia.post(route('logout'))
        },
        viewProfile() {
            this.$inertia.visit(route('profile.show'))
        },
        viewDashboard() {
            this.$inertia.visit(route('dashboard'))
        },
    },
    computed:{
        loggedIn(){
            return this.$page.props.user !== null;
        }
    }
}
</script>

<style>
.nav-icon{
    width: 36px;
    height: 36px;
    color:white;
}
nav {
    background: black;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
}

.nav-left {
    /* Add styles for links or branding */
}

.nav-right {
    /* Add styles for right-aligned elements */
}

.nav-center h2{
    font-size: 32px;
    color: white;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 16px 24px;
    margin: auto;
}
.dropdown-left {
    right: 0;
    left: auto;
}

.dropdown:hover .dropdown-content {
    display: block;
    margin: auto;
    width: max-content;
}

.dropdown-option{
    display: block;
    margin: auto;
    width:100%;
    padding: 4px;
}
.dropdown-option:not(:hover) {
    opacity: 0.5;
}
</style>
