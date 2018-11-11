package com.example.powlaw.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Search extends AppCompatActivity {
    Button search;
    EditText etSearch;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.search);

    search=(Button) findViewById(R.id.search);
    etSearch=(EditText) findViewById(R.id.etSearch);
    search.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View view) {
            Intent intent = new Intent(Search.this,Order_Data.class);
            intent.putExtra("search",etSearch.getText().toString());
            startActivity(intent);
        }
    });

    }
}
