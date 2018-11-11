package com.example.powlaw.myapplication;

import android.content.Intent;
import android.os.Bundle;

public class Order_Data extends Search {

    private static final String insertURL = "http://192.168.168.192/android/select.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.order_data);

        Intent in = getIntent();
        String search = in.getStringExtra("search");

      //  Toast.makeText(this, search, Toast.LENGTH_SHORT).show();
    }
}
