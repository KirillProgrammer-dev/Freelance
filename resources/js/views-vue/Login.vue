<template>
  <div>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Электронная почта</label
        >
        <input
          v-model="form.email"
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
        <div id="emailHelp" class="form-text">
          Мы никогда не поделимся вашей почтой с другими
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input
          v-model="form.password"
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
      </div>
      <v-btn
        :color="$vuetify.theme.themes.light.primary"
        style="color: black;"
        @click="getToken()"
      >
        Войти
      </v-btn>
      <div
        id="error"
        class="form-text"
        :style="'color:' + $vuetify.theme.themes.light.error + '; display:' + (isCorrect ? 'none' : 'block')"
      >
        Вы ввели неверный пароль или логин
      </div>
    </form>
  </div>
</template>

<style scoped>
form {
  padding: 20px;
  padding-top: 100px;
  padding-right: 40%;
  padding-left: 30%;
}

button {
  color: #fff;
}
</style>

<script>
import store from "../store";

export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
      },
      isCorrect: store.state.isCorrect,
    };
  },
  methods: {
    getToken() {
      store
        .dispatch("getToken", {
          email: this.form.email,
          password: this.form.password,
        })
        .then(() => {
          this.isCorrect = store.state.isCorrect;
        });
    },
  },
};
</script>
