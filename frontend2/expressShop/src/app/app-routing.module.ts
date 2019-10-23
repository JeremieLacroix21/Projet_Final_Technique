import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { AuthGuard } from './guard';
import { SubscribeComponent } from './subscribe/subscribe.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: '404', component: PageNotFoundComponent },
  //{ path: '**', redirectTo: '404' },
  {
    canActivate: [AuthGuard],
    path: 'home',
    loadChildren: () => import(`./home/home.module`).then(m => m.HomeModule)
  },
  {
    canActivate: [AuthGuard],
    path: 'login',
    component: LoginComponent,
  },
  {
    canActivate: [AuthGuard],
    path: 'subscribe',
    component: SubscribeComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
