<template>
  <div class="q-pa-md row items-start q-gutter-md justify-center">
    <div class="col-8 col-sm-8 loginWrapper">
      <q-card class="my-card">
        <q-card-section>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <img class="loginImage" src="/images/login.jpg" alt="Login">
              </div>
            </div>
            <div class="col">
              <div><h4>Đăng ký tài khoản</h4></div>
              <form class="q-gutter-md frmLogin">
                <q-input
                    ref=""
                    label="Họ và tên"
                    outlined
                    lazy-rules
                    :rules="[]"
                />
                <q-input
                    ref="name"
                    label="Tên đăng nhập"
                    outlined
                    lazy-rules
                    :rules="[]"
                />
                <q-input
                    ref="emailRef"
                    label="Email"
                    v-model="email"
                    outlined
                    lazy-rules
                    :rules="emailRules"
                />
                <q-input
                    label="Mật khẩu"
                    outlined
                    lazy-rules
                    :rules="[]"
                />
                <q-input
                    label="Nhập lại mật khẩu"
                    outlined
                    lazy-rules
                    :rules="[]"
                />
                <div>
                  <q-btn label="Đăng ký" type="login" color="primary"></q-btn>
                </div>
                <div>
                  <router-link class="textLink" :to='{ name: "Login" }'>Đăng nhập</router-link>
                  nếu bạn đã có tài khoản ?
                </div>
              </form>
            </div>

          </div>
        </q-card-section>
      </q-card>
    </div>
  </div>
</template>

<script>
import {ref, watch} from 'vue'
import api from '../api'
import {useQuasar} from 'quasar'
import _ from 'lodash'
import {useStore} from 'vuex'
import {useRouter} from 'vue-router/dist/vue-router'
import {isValidEmail} from "../utils/helpers";

export default {
  name: "Register",
  setup() {
    const $q = useQuasar()
    const store = useStore()
    const router = useRouter()

    const userName = ref(null)
    const userNameRef = ref(null)
    const userNameRules = [
      val => (val && val.length > 0) || 'Tên đăng nhập không được bỏ trống'
    ]

    const fullName = ref(null)
    const fullNameRef = ref(null)
    const fullNameRules = [
      val => (val && val.length > 0) || 'Họ và tên không được bỏ trống'
    ]

    const email = ref(null)
    const emailRef = ref(null)
    const emailRules = [
      val => (val && val.length > 0) || 'Email không được bỏ trống',
      val => isValidEmail(val) || 'Không đúng đinh dạng email'
    ]

    const password = ref(null)
    const passwordRef = ref(null)
    const passwordRules = [
      val => (val && val.length > 0) || 'Mật khẩu không được bỏ trống'
    ]

    return {
      email,
      emailRef,
      emailRules
    }
  }
}
</script>

<style scoped lang="scss">
.loginWrapper {
  margin-top: 5vw;

  .frmLogin {
    margin-top: 20px;

    .textLink {
      text-decoration: none;
      font-weight: bold;
      color: #3988D7;

      &:visited {
      }
    }
  }

  .loginImage {
    width: 100%;
  }
}
</style>