<?php

namespace app\controllers;

use app\models\aboutForm;

use app\models\Artwork;
use app\models\Cart;
use app\models\Order;
use app\models\Orderartwork;
use app\models\Portfolio;
use app\models\Review;
use app\models\ReviewForm;
use Faker\Provider\DateTime;
use Yii;

use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CommissionForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'commission', 'profile', 'orders', 'addtoCart', 'adminpage', '_ordersArtwork'],
                'rules' => [
                    [
                        'actions' => ['logout', 'commission', 'profile', 'orders', 'addtocart', '_ordersArtwork'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['commission', 'profile', 'orders', 'addtocart', '_ordersArtwork'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['adminpage'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ]

                ],
            ],//do adminpage
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */


    public function actionAbout()
    {
        $model = new AboutForm();

        if ($model->load(Yii::$app->request->post()) && $model->aboutMail()) {
            // valid data received in $model
            Yii::$app->session->setFlash('aboutFormSubmitted');
            return $this->refresh();
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('about', ['model' => $model]);
        }
    }

    public function actionCommission()
    {


        $model = new CommissionForm();

        if ($model->load(Yii::$app->request->post()) && $model->commissionMail()) {
            // valid data received in $model
            Yii::$app->session->setFlash('commissionFormSubmitted');
            return $this->refresh();
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('commission', ['model' => $model]);
        }
    }

    public function actionPortfolio()
    {

        $request = Yii::$app->request;
        $model = new Portfolio();

        if ($catid = $request->get('category')) {
            $model->setCategory($catid);
        }
        $query = $model->query()
            ->asArray()
            ->all();

        if ($model->load(Yii::$app->request->post())) {
            $query = $model->query()
                ->asArray()
                ->all();
        }
        return $this->render('portfolio', ['model' => $model, 'query' => $query]);
    }


    public function actionArtwork()
    {
        $model = new ReviewForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->addReview();
        }

        return $this->render('artwork', ['model' => $model]);

    }


    public function actionProfile()
    {

        return $this->render('profile');

    }

    public function actionOrders()
    {


        return $this->render('orders');

    }


    public function actionAdminpage()
    {
        return $this->render('adminpage');
    }

    public function actionAddtocart()
    {
        return $this->render('addToCart');
    }



}

