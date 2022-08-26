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
                    ref="name"
                    label="Tên đăng nhập/Email"
                    outlined
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                ></q-input>
                <q-input
                    label="Mật khẩu"
                    outlined
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                ></q-input>
                <q-input
                    label="Nhập lại mật khẩu"
                    outlined
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                ></q-input>
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
export default {
  name: "Register"
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